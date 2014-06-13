squid <2.7>
=====

http://people.redhat.com/jskala/squid/squid-2.7.STABLE9-1.el5/src/squid-2.7.STABLE9-1.el5.src.rpm   可用于centos6
======


./configure --build=x86_64-redhat-linux-gnu --host=x86_64-redhat-linux-gnu --target=x86_64-redhat-linux-gnu --program-prefix= --prefix=/usr --exec-prefix=/usr --bindir=/usr/bin --sbindir=/usr/sbin --sysconfdir=/etc --datadir=/usr/share --includedir=/usr/include --libdir=/usr/lib64 --libexecdir=/usr/libexec --sharedstatedir=/var/lib --mandir=/usr/share/man --infodir=/usr/share/info --exec_prefix=/usr --libexecdir=/usr/lib64/squid --localstatedir=/var --datadir=/usr/share/squid --sysconfdir=/etc/squid


http_port 80 accel  vhost vport
visible_hostname cdn.server.com
cache_peer 127.0.0.1 parent 808 0 no-query no-digest originserver name=www
#cache_peer_domain www www.server.com
#cache_peer_access www allow all
http_access allow all
#refresh_pattern -i \.html$ 1440 100% 1440 ignore-reload ignore-no-store ignore-private reload-into-ims
#refresh_pattern -i .* 1440 100% 10080 override-expire override-lastmod reload-into-ims ignore-reload ignore-no-cache ignore-private
#cache_log /var/log/squid/cache.log
#cache_dir ufs /var/spool/squid 100 16 256








http_port 80 accel  vhost vport
visible_hostname cdn.molbase.com
cache_effective_user squid
#cache_dir ufs /var/spool/squid 100 16 256
cache_dir ufs /var/cache/squid 100 16 256
access_log /var/logs/squid/access.log squid
cache_log /var/logs/squid/cache.log
cache_store_log /var/logs/squid/store.log
#pid_filename /var/run/squid/squid.pid
cache_peer 127.0.0.1 parent 808 0 no-query no-digest originserver name=www
http_access allow all
