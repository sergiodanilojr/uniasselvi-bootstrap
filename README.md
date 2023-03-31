# MovieFlix

Este projeto corresponde à tutoria prestada por mim aos alunos do quinto semestre do curso de Análise e Desenvolvimento de Sistemas da UNIASSELVE, a fim de instruí-los como subir uma aplicação PHP utilizando Docker e a construção de um mini framework nesta linguagem, para que os ampare no desenvolvimento da aplição correspondente a este repositório.

## Requisitos

- Docker Engine instalado na máquina
- Docker Compose
- Editor de Texto para códigos (e.g. Visual Studio Code)
- Persistência

## Comandos Docker básicos para gerenciar o Projeto

### Listando os containers daquela pasta em questão

```bash 
    $ docker-compose ps
```

### Listando todos os containers em execução na sua máquina

```bash 
    $ docker ps
```

### Subindo o container

```bash 
    $ docker-compose up -d
```

> A diretiva ```-d``` serve para que o Docker não trave o seu terminal, portanto, entre no modo ```detatched```

### Derrubando os containers de serviços

```bash 
    $ docker-compose down
```

### Restartando os containers de serviços

```bash 
    $ docker-compose restart
```

### Removendo a execução de todos os containers ativos da sua máquina

```bash 
    $ docker rm -f $(docker ps -a -q)
```
