Usage:

1) Install Docker
2) Clone / download / unzip project
3) Change current dir to project root
4) Run `docker build -t php:7.4-cli-gd .`
5) Edit config in `config.php` according your needs
5) Run on Mac/Linux: `docker run --rm -v "$PWD":/usr/src/workdir -w /usr/src/workdir php:7.4-cli-gd php script.php`
6) Run on Windows: `docker run --rm --volume //c/Users/username/ilya_script:/usr/src/workdir -w /usr/src/workdir php:7.4-cli-gd php script.php`