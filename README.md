# Project Deployments

Use a container based on an `eclipse-temurin` image
```
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
java -jar target/gs-serving-web-content-0.1.0.jar
```

Finally, visit http://localhost:8080/greeting

See  
https://spring.io/guides/topicals/spring-boot-docker  
https://spring.io/guides/gs/serving-web-content
