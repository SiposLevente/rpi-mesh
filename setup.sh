#!/bin/bash

if [[ `whoami` != "root" ]];then
    echo "Run this script with root privilages!"
    exit 1
fi

cd `dirname $0`
if [[ $1 == "upgrade" ]];then
  echo "Updating RPi-Mesh..."
  git pull
fi

latest_batman="batman-adv-2022.2"

echo "Updating repos..."
apt update
echo "Installing essential packages..."
apt install -y git apache2 php wget batctl bridge-utils hostapd build-essential net-tools netfilter-persistent gcc make ssh network-manager
systemctl unmask hostapd.service
systemctl disable hostapd.service
systemctl stop hostapd.service
systemctl enable ssh
systemctl start ssh
systemctl enable NetworkManager
systemctl start NetworkManager
rfkill unblock 0

echo "noarp" >> /etc/dhcpcd.conf
echo "noipv4ll" >> /etc/dhcpcd.conf

echo "Copying persistency service for mesh node..."
cp mesh-node-persistency.service /etc/systemd/system

echo "Enabling persistency service for mesh node..."
systemctl daemon-reload
systemctl enable mesh-node-persistency.service

is_in_file=`grep "batman-adv" /etc/modules`
if [[ $1 == "upgrade" || $is_in_file != "batman-adv" ]];then
  echo "Getting B.A.T.M.A.N-advanced package..."
  wget https://downloads.open-mesh.org/batman/releases/$latest_batman/$latest_batman.tar.gz
  echo "Extracting B.A.T.M.A.N-advanced..."
  tar -xvf $latest_batman.tar.gz
  cd $latest_batman
  echo "Building and installing B.A.T.M.A.N-advanced..."
  make
  make install
  depmod -a
  echo "Adding B.A.T.M.A.N-advanced kernel module..."
  modprobe batman-adv
  cd ..
  rm -rd batman-adv-*
fi

if [[ $is_in_file != "batman-adv" ]];then
  echo "batman-adv" >> /etc/modules
fi

is_in_file=`grep "net.ipv4.ip_forward=1" /etc/sysctl.conf`
if [[ $is_in_file != "net.ipv4.ip_forward=1" ]];then
  echo "Enabling forwarding..."
  echo "net.ipv4.ip_forward=1" >> /etc/sysctl.conf
fi

echo "Copying scripts /etc/node-scripts/"
mkdir -p /etc/node-scripts/
cp -r ./scripts/* /etc/node-scripts/

echo "Copying web content to /var/www/html"
mkdir -p /var/www/html/
cp -r ./webpage/* /var/www/html/

SCRIPTS="scripts/*"
for file in $SCRIPTS
do
  is_in_file=`grep "www-data ALL = NOPASSWD: /etc/node-scripts/${file##*/}" /etc/sudoers`
  if [[ $is_in_file != "www-data ALL = NOPASSWD: /etc/node-scripts/${file##*/}" ]];then
    echo "www-data ALL = NOPASSWD: /etc/node-scripts/${file##*/}" >> /etc/sudoers
  fi
done
echo "Setup script finished!"
exit 0
