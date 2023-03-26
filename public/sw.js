self.addEventListener("install", e => { 
    e.waitUntil(
    caches.open("static").then(cache => {
        return cache.addAll(["./", "./css/app.css", "./Favicon-144px.png"]);
    })
    );
 });

 self.addEventListener("fetch", e => { 
   console.log(`Intercapting fetch request for:${e.request.url}`);
 });