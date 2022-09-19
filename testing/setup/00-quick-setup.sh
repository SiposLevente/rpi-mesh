#!/bin/bash
sudo apt update
sudo apt-get install batctl bridge-utils build-essential net-tools vim
wget https://downloads.open-mesh.org/batman/releases/batman-adv-2022.2/batman-adv-2022.2.tar.gz
tar -xvf archive.tar.gz
cd batman-adv-2022.2
make
sudo make install
sudo depmod -a
sudo modprobe batman-adv
echo 'batman-adv' | sudo tee -a /etc/modules