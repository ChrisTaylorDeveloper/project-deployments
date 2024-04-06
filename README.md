# Project Deployments

## Serving Web Content MVC
Use a container based on an `eclipse-temurin` image
```
cd Serving-Web-Content-MVC

docker run -it --rm --name sb-proj \
-v "$(pwd)":/usr/src/sb -w /usr/src/sb -p 8080:8080 \
eclipse-temurin:17-jdk-alpine sh
```

then, run with Maven
```
./mvnw spring-boot:run
```

or build and run a jar
```
./mvnw clean package
java -jar target/serving-web-content-0.0.1-SNAPSHOT.jar
```
Finally, visit http://localhost:8080/greeting

or, to run detached on lemp2404, for example
```
cd project-deployments

docker run -d -it --rm --name sb-proj \
-v "$(pwd)":/usr/src/sb -w /usr/src/sb -p 82:8080 \
eclipse-temurin:17-jdk-alpine sh -c 'cd Serving-Web-Content-MVC && ./mvnw spring-boot:run'
```

See  
https://spring.io/guides/topicals/spring-boot-docker  
https://spring.io/guides/gs/serving-web-content
