const Ziggy = {
    "url":"http:\/\/localhost","port":null,"defaults":{},
    "routes":{"home":{"uri":"\/","methods":["GET","HEAD"]},"contact":{"uri":"contact","methods":["GET","HEAD"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
