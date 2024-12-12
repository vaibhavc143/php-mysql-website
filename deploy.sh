#!/bin/bash

# Pull the latest Docker image from ECR
echo "Logging into ECR..."
aws ecr get-login-password --region ap-south-1 | docker login --username AWS --password-stdin 491085408142.dkr.ecr.ap-south-1.amazonaws.com

echo "Pulling Docker image from ECR..."
docker pull 491085408142.dkr.ecr.ap-south-1.amazonaws.com/todo-app:latest

# Stop and remove the old container if it exists
docker ps -q --filter "name=my-php-app" | xargs -r docker stop | xargs -r docker rm

# Run the new Docker container
docker-compose -f /home/ec2-user/docker-compose.yml up -d
