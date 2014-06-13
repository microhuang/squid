squid <2.7>
=====


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
