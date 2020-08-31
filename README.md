## ft_server

This is ft_server's 42 project where we have to set up a Docker container with nginx, a MySQL server, PHP and Wordpress.

The subject of the project breaks the "One service one container" rule, therefore I started the three services using SysV and then used tail -f /dev/null so the container would not exit.

There is still an error thrown everytime the MySQL server starts that I haven't figured out but the project works and got validated.