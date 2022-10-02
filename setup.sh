#!/bin/bash

if [[ `whoami` != "root" ]];then
    echo "Run this script root privilages!"
    exit 1
fi

echo "Updating repos..."
apt update
echo "Installing essential packages..."
apt install -y git apache2 php wget batctl bridge-utils build-essential net-tools netfilter-persistent gcc make

echo "Getting B.A.T.M.A.N-advanced package..."
wget https://downloads.open-mesh.org/batman/releases/batman-adv-2022.2/batman-adv-2022.2.tar.gz
echo "Extracting B.A.T.M.A.N-advanced..."
tar -xvf batman-adv-2022.2.tar.gz
cd batman-adv-2022.2
echo "Building and installing B.A.T.M.A.N-advanced..."
make
make install
depmod -a
echo "Adding B.A.T.M.A.N-advanced kernel module..."
modprobe batman-adv
echo 'batman-adv' >> /etc/modules
cd ..
rm -rd batman-adv-*

echo "Enabling forwarding..."
echo "net.ipv4.ip_forward=1" >> /etc/sysctl.conf

echo "Copying scripts /etc/node-scripts/"
mkdir -p /etc/node-scripts/
cp -r ./scripts/* /etc/node-scripts/

echo "www-data ALL = NOPASSWD: /etc/node-scripts/*" >> /etc/sudoers