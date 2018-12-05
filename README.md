[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/et-nik/gameap/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/et-nik/gameap/?branch=develop)
![Version](https://img.shields.io/badge/version-alpha-red.svg)

* [Documentation](http://docs.gameap.ru/)
* [GameAP 1/2 repo](https://github.com/et-nik/gameap-legacy)
* [Supported OS](#supported-os)
* [Supported games](#supported-games)
* [Friends with](#friends-with)
* [TODO](#todo)

Server Requirements
======

Web
------
* PHP version 7.1 or newer.
* GD PHP
* OpenSSL PHP
* CURL PHP

Dedicated Server (Linux)
------

* Installed GameAP Daemon


Dedicated Server (Windows)
------

* Installed GameAP Daemon
* Administration privileges


Supported OS
------

| Operating System       | Version    | Supported  | Notes                   |
|-----------------------|-----------|-----------|----------------------------|
| Windows               |   2019    | ✅        |
|                       |   2016    | ✅        |
|                       |   2012    | ✅        |
|                       |   2008    | ✅        |
| Debian                | 9 / stretch| ✅       |
|                       | 8 / jessie | ✅       |
|                       | 7 / wheezy | ✅       |
| Ubuntu                | 18.04     | ✅       |
|                       | 16.04     | ✅       |
|                       | 14.04     | ✅       |
|                       | 12.04     | ✅       |
| CentOS                | 7         | ✅       |
|                       | 6         | ✅       |

Supported games
------

| Game | Query | Rcon | Notes |
| ------ | ------- | ------ | ------- |
| Minecraft | ✅ | ✅|
| Half-Life| ✅ | ✅ | Supported all versions and many popular mods (Sven Co-op, HeadCrab Frenzy) |
| Counter-Strike | ✅ | ✅ | Supported all versions (1.6, Source, Global Offencive) |
| Team Fortress 2 | ✅ | ✅ |
| Garry's Mod | ✅ | ✅ |
| Rust | ✅ | ✅ |
| Terraria | | 
| San Andreas: MP | |
and many more... 

Friends with
------

* Docker
* LXC
* OpenVZ

[All supported games list](#)

TODO
------

- [ ] Multilang. Russian language
- [ ] Checking OS and autoinstall server part (GameAP Daemon)
- [ ] Sheldules
- [ ] Autoconverting from old GameAP versions