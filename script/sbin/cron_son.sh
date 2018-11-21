#! /bin/sh
XDG_RUNTIME_DIR=/run/user/1000
export DISPLAY=:0 && export XAUTHORITY=/home/pi/.Xauthority
python3 /var/www/e_reveil/script/python/lecture_son.py
