requirejs.config({
    paths: {
        "moment": "../externals/moment",
        "jQuery": ["//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min","../externals/jq"],
        "jquery": ["//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min", "../externals/jq"],
        "knockout": ["//ajax.aspnetcdn.com/ajax/knockout/knockout-2.2.1","../externals/ko"],
        "jQueryMouseWheel": "../externals/jquery.mousewheel.min",
        "scrollbar": "../externals/jquery.mCustomScrollbar.min",
        "jQueryQtip": "../externals/jquery.qtip",
        "json": ["../externals/json2","http://cdnjs.cloudflare.com/ajax/libs/json2/20121008/json2.min"],
        "raphael": ["../externals/raphael-min"],
        "g.raphael": "../externals/g.raphael-min",
        "g.pie": "../externals/g.pie-min",
        "jquery.modal": "../externals/jquery.modal",
        "scrollbox": "../externals/jquery.scrollbox"
    },
    baseUrl: '../scripts',
    shim: {
        "moment": {
            exports: "moment"
        },
        'jQuery': {
            exports: '$'
        },
        'jquery': {
            exports: '$'
        },
        "jQueryMouseWheel": {
            deps: ["jQuery"]
        },
        "g.raphael": {
            deps: ['raphael']
        },
        "g.pie": {  
            deps: ['g.raphael']
        },
        "scrollbar": {
            deps: ["jQuery", "jQueryMouseWheel"]
        },
        "scrollbox": {
            deps: ["jQuery"]
        }
    }
});