ARG MYSQL_VERSION
FROM mysql:${MYSQL_VERSION:-8.0}
USER mysql

RUN max_allowed_packet=128M
RUN log_bin_trust_function_creators=on
