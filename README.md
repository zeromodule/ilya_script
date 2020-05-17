Usage:

1) Install Docker
2) Clone / download / unzip project
3) Change current dir to project root
4) Run `docker build -t php:7.4-cli-gd .`
5) Edit config in `config.php` according your needs
5) Run: `docker run --rm -v "$PWD":/usr/src/workdir -w /usr/src/workdir php:7.4-cli-gd php script.php`