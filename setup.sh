#!/bin/sh
minikube stop
minikube delete --all
minikube start --driver=docker
minikube addons enable dashboard
minikube addons enable metallb
minikube addons enable metrics-server

eval $(minikube docker-env)
docker build -t nginx srcs/nginx/
docker build -t mysql srcs/mysql/
docker build -t wordpress srcs/wordpress/
docker build -t phpmyadmin srcs/phpmyadmin/
docker build -t ftps srcs/ftps/
docker build -t influxdb srcs/influxdb/

kubectl apply -f https://raw.githubusercontent.com/metallb/metallb/v0.9.6/manifests/namespace.yaml
kubectl apply -f https://raw.githubusercontent.com/metallb/metallb/v0.9.6/manifests/metallb.yaml
# On first install only
kubectl create secret generic -n metallb-system memberlist --from-literal=secretkey="$(openssl rand -base64 128)"

kubectl apply -f srcs/metallb-config.yaml

kubectl apply -f srcs/nginx/nginx.yaml
kubectl apply -f srcs/wordpress/wordpress.yaml
kubectl apply -f srcs/mysql/mysql.yaml
kubectl apply -f srcs/phpmyadmin/phpmyadmin.yaml
kubectl apply -f srcs/ftps/ftps.yaml
kubectl apply -f srcs/influxdb/influxdb.yaml

minikube dashboard