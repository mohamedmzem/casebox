Casebox
======================================================

Casebox is a Content Management Platform for record, file and task management.

Casebox was developed jointly by HURIDOCS and KETSE.com.

Starting in 2017, HURIDOCS manages its own version of the Casebox codebase for human rights organisations and KETSE.com continues to support the original code. If your request is not related to human rights work and you are not a non-profit, then please contact Ketse at info (at) ketse.com for more information on the commercial services they can provide.


# Casebox

Casebox is a Content Management Platform for record, file and task management.

Full documentation can be found on the website:
http://docs.casebox.org/en/latest/


## Installation

In order to try Casebox on your local machine, we recommend to use [casebox-vagrant](https://github.com/KETSE/casebox-vagrant.git) provision or consult wiki page https://github.com/KETSE/casebox/wiki


## Migration Roadmap

The following upgrades are planned but require compatibility updates in the external bundles
(`caseboxdev/core-bundle`, `caseboxdev/rpc-bundle`, `caseboxdev/rest-bundle`) before they can be applied:

| Task | Current | Target | Notes |
|---|---|---|---|
| PHP version | `>=7.1` | `>=8.1` | Requires bundle compatibility audit |
| Symfony | `3.0.*` | `6.x` or `7.x` | Major breaking changes — full migration needed |
| Twig | `<2.0` | `^3.0` | Paired with Symfony upgrade |
| Mailer | `SwiftmailerBundle` | `symfony/mailer` | SwiftMailer is abandoned since 2021 — [migration guide](https://symfony.com/doc/current/mailer.html) |
| Package name | ~~`KETSE/casebox`~~ | `ketse/casebox` | ✅ Corrigé — suit désormais la convention lowercase Composer |
