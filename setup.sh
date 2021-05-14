#!/bin/sh
minikube stop
minikube delete --all
minikube start --driver=docker
minikube addons enable dashboard
minikube addons enable metallb

eval $(minikube docker-env)
docker build -t nginx srcs/nginx/
docker build -t mysql srcs/mysql/
docker build -t phpmyadmin srcs/phpmyadmin/

kubectl apply -f https://raw.githubusercontent.com/metallb/metallb/v0.9.6/manifests/namespace.yaml
kubectl apply -f https://raw.githubusercontent.com/metallb/metallb/v0.9.6/manifests/metallb.yaml
# On first install only
kubectl create secret generic -n metallb-system memberlist --from-literal=secretkey="$(openssl rand -base64 128)"

kubectl apply -f srcs/metallb-config.yaml

kubectl apply -f srcs/nginx/nginx.yaml
kubectl apply -f srcs/mysql/mysql.yaml
kubectl apply -f srcs/phpmyadmin/phpmyadmin.yaml

minikube dashboard