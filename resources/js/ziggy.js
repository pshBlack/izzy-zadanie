const Ziggy = {
    url: "http:\/\/localhost:8000",
    port: 8000,
    defaults: {},
    routes: {
        "cars.index": { uri: "\/", methods: ["GET", "HEAD"] },
        "cars.create": { uri: "cars\/create", methods: ["GET", "HEAD"] },
        "cars.store": { uri: "cars", methods: ["POST"] },
        "storage.local": {
            uri: "storage\/{path}",
            methods: ["GET", "HEAD"],
            wheres: { path: ".*" },
            parameters: ["path"],
        },
    },
};
if (typeof window !== "undefined" && typeof window.Ziggy !== "undefined") {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
