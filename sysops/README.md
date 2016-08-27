# infrastructure/sysops

EC2 instance should be created manually, currently ubuntu14.04 LTS is used as base image.
 
 The commands below assume you are in the sysops/ansible directory.
 
 The docker host can be provisioned using:
 
 ```
 ansible-playbook site.yml -i hosts
 ```
 
 You are able to add your own ssh-key and it will be deployed to the server so you can log in.
 
 Add your ssh public key to ssh_access/files/public_keys and reference the file in ssh_access/vars/main.yml.
 
 Deploy the keys with:
 ```
 ansible-playbook -i hosts site.yml --tags "ssh_access"
 ```
 
 
 After this, webski can be deployed from github by using:
 ```
 ansible-playbook -i hosts site.yml deploy/pegski.yml
 ```
