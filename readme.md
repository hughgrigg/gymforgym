Gym for Gym
===========

[![Build Status](https://travis-ci.org/hughgrigg/gymforgym.svg?branch=master)](https://travis-ci.org/hughgrigg/gymforgym)
[![Coverage Status](https://coveralls.io/repos/github/hughgrigg/gymforgym/badge.svg?branch=master)](https://coveralls.io/github/hughgrigg/gymforgym?branch=master)

## Vagrant 

```bash
git clone git@github.com:hughgrigg/gymforgym.git
cd gymforgym
git clone git@github.com:laravel/homestead.git ./vendor/laravel/homestead
cp infrastructure/vagrant/Homestead.example.yaml Homestead.yaml
```

Change the map key in Homestead.yaml to where you have cloned the gymforgym
repo.

Add this line to your hosts file (e.g. `/etc/hosts`):

```
192.168.10.10   www.gymforgym.dev
```

Then boot the Vagrant box and log in:

```bash
vagrant up --provision
vagrant ssh
```

## Deployment

```bash
virtualenv --no-site-packages infrastructure/VIRTUAL --python $(which python2)
source infrastructure/VIRTUAL/bin/activate
pip install -r ./infrastructure/requirements.txt
# Ensure ssh key is added, then:
ansible-playbook ./infrastructure/ansible/web.yml -i ./infrastructure/ansible/hosts 
```
