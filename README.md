## Usage

This configuration is intended to be used as a Docker-based development environment for Magento 2.4.1 and above.

Folders:

- `stack`: stack setup files
- `bin`: commands using Docker Compose

## Prerequisites

This setup assumes you are running Docker on a computer with at least 4GB of allocated RAM, a dual-core, and an SSD hard drive. [Download & Install Docker Desktop](https://www.docker.com/products/docker-desktop).

## Setup

### Automated Setup :robot:

Run this automated one-liner from the directory you have installed your project.

```bash
curl -s https://raw.githubusercontent.com/arnia/magento-tech/master/online/install | bash -s -- [APPLICATION_NAME]
```

Note that since we need to write to `/etc/hosts` for DNS resolution, you will be prompted for your system password during setup.

After the one-liner above completes running, you should be able to use the Magento Tech tool.

### Manual Setup :hand:

```bash
# Download the Magento Tech tool:
curl -s https://raw.githubusercontent.com/arnia/magento-tech/master/online/download | bash

# Setup application by providing [APPLICATION_NAME]:
.tech/bin/setup [APPLICATION_NAME]

# Install application:
.tech/bin/install
```

### Daily usage :book:

Start the environment
```bash
# From the root project
.tech/bin/env/start
```

Start minimal containers for development
```bash
# From the root project
.tech/bin/env/start application search cache database
```

Stop the environment
```bash
# From the root project
.tech/bin/env/stop
```

Execute magento commands from host to container
```bash
# From the root project
.tech/bin/magento cache:flush

# Specific commands
.tech/bin/setup-static-content-deploy
.tech/bin/setup-di-compile
.tech/bin/setup-upgrade
```

### Who do I talk to? ###

* Repo owner or admin
* Other community or team contact
