var http = require('http');
var fs = require('fs');
var urlutil = require('url');
var path = require('path');
var mime = require('./mime');
http.createServer(function(request, response){
    var urlpath = urlutil.parse(request.url).pathname;
    //__dirname 很神奇
    var absPath = __dirname + "/root" + urlpath;
    //此处fs.exists只可以使用在0.8.15中
  fs.exists(absPath, function(exists) {
        if(exists) {
            //二进制方式读取文件
            fs.readFile(absPath,'binary',function(err, data) {
            var ext = path.extname(urlpath);
            ext = ext ? ext.slice(1) : 'unknown';
            console.log(ext);
            var contentType = mime.types[ext] || "text/plain";
            console.log(contentType);
            response.writeHead(200,{'Content-Type':contentType});
            //使用二进制模式写
            response.write(data,'binary');
            response.end();
    });
        } else {

            response.end('404 File not found.');
        }
    });
}).listen(1234);
console.log('Server start in port 1234.');
