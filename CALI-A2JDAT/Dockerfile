FROM caliorg/a2jdat

COPY config.json /usr/app/src/
#ENV LD_LIBRARY_PATH=/usr/local/lib64/:$LD_LIBRARY_PATH

#RUN apt upgrade -y
EXPOSE 3000

CMD [ "npm", "start" ]
