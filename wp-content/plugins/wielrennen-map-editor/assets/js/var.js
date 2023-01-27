var $ = jQuery;

document.domain = "mapeditor.arhamsoft.info";

var MAPBOX_TOKEN = 'pk.eyJ1IjoiemFpYm1hc2hhZCIsImEiOiJja3QxaTNmMWYwNG1uMzByMXBkeGxyYzNlIn0.dfrxGDr92Sla189KhGPkfQ';

var MAPBOX = {

    token: MAPBOX_TOKEN,

};



var APP = jQuery({});

    APP.iframe = false;

    APP.support = false;

    APP.render = false;

    APP.ready = false;

    APP.basemap = {

        main: 'label',

        enable: true,

    };

    APP.store = {

        timer: undefined,

    };



/* ---------------------------------------------------------------------- API --- */

var API = {};

    API.root = 'https://mapeditor.arhamsoft.info/wp-admin/admin-ajax.php';





/* ------------------------------------------------------------------- MAPBOX --- */

var MAPBOX = {};

    MAPBOX.token = MAPBOX_TOKEN;

    MAPBOX.style = {

        basemap: 'zaibmashad/cktgakgzr0x9d18wbux5erbgd',

        black_white: 'zaibmashad/clal07gp4006d14qs659ilrzg',

        blue: 'zaibmashad/cktgarp7d0ute17pfvhaemweb',

        grey_dark: 'zaibmashad/cktgaqqr042qi18qrn6kaoqlr',

        grey_light: 'zaibmashad/cktgail7a19ag17r4iexbs9sb',

        orange: 'zaibmashad/cktgalz9a1zhi17mo9vpk3ks2',

        outdoor: 'zaibmashad/cktgan9480unb18p97mx40qab',

        pastel: 'zaibmashad/cktgaosrp0uoq18p9u45wh9fc',

        spring: 'zaibmashad/cktgaprsq409w17n7xglu8y34',

        lichtblauw: 'zaibmashad/cl9zgzfvk008x15s2231zdbph',
        
        donkerblauw: 'zaibmashad/cl9zhkz78003f14qtav6x8n3w',

        vintage: 'zaibmashad/cla0p9z3b00br14nxt23576n8',

        retro: 'zaibmashad/cla0pm0xr002m14o5oc4wyx3t',

        groen: 'zaibmashad/cla0pjxka00em15smllzrh255',
        street: 'mapbox/streets-v11',
        americanrust: 'zaibmashad/clagnr9qh002a15rwz1ankebf',
        lingerie: 'zaibmashad/clagncrv5000915piuco5smqq',
        swampthings: 'zaibmashad/clagmndqz005l14od75z7w002',
        mintymiles: 'zaibmashad/clagi816c003r14o1was6147w',
        crimsonride: 'zaibmashad/claghfvgn002015rwl64wsqfw',
        paperchase: 'zaibmashad/cla5s7pql00gp15s2vc182kx0',
        reddead: 'zaibmashad/cla5s6h7q00go15s2s06s1bmi',
        moonraker: 'zaibmashad/cla5s3mrn001915nwv2o0znjb',
        coppermine: 'zaibmashad/cla5s249w004r15pqvlayx7v2',
        heather: 'zaibmashad/cla0t2j3x003114s03h2zmd7b',
        outlinesonice: 'zaibmashad/clagry76m000p14n4win2ur9m',
        outline2: 'zaibmashad/clagrsrip001k14sa6rgn415c',
        theclassic: 'zaibmashad/cla0snsei002h15lrsdqn5wmx',

    };



/* ------------------------------------------------------------------- STRAVA --- */

var STRAVA = {};

    STRAVA.token = undefined;

    STRAVA.exipry = undefined;

    STRAVA.window = undefined;

    STRAVA.activity = [];



/* ------------------------------------------------------------------ WORDPRESS --- */

var WORDPRESS = {};

    WORDPRESS.product = undefined;



/* ------------------------------------------------------------------ BASEMAP --- */

var BASEMAP = {};



/* ------------------------------------------------------------------- DESIGN --- */

var DESIGN = {};

    DESIGN.guid = undefined;

    DESIGN.paper = {

        material: 'framed_poster',

        size: '20x30',

        orientation: 'portrait',

    };

    DESIGN.poster = {

        style: 'grey_light',

    };

    DESIGN.font = {

       family: 'circular',

       size: 'medium',

    };

    DESIGN.layer = {};

    DESIGN.layer.map = {

		zoom: 6.5,

		center: [52.221, 5.281,],

		bound: [[52.12, 46.77,], [5.16, 45.73,],],

	};

    DESIGN.layer.overlay = {

        type: 'none',

    };

    DESIGN.layer.activity = {

        item: [],

        line_width: 3,

        point_finish: false,

        point_activity: false,

    };

    DESIGN.layer.label = {

        item: [],

    };

    DESIGN.layer.outline = {

        type: 'none',

    };
    
    DESIGN.layer.framed_poster = {

        poster: 'black',

    };


    DESIGN.layer.elevation = {

        enable: false,

        multiply: 'small',

    };

    DESIGN.layer.text = {

        headline: 'Mijn onvergetelijke avontuur',

        subtitle: 'Jouw naam',

        footnote: '',

        metadata: '',
// theme 2

        theadline: 'Mijn onvergetelijke avontuur',

        tsubtitle: 'Jouw naam',

        labelone: 'Label 1',
        valueone: 'Waarde 1',

        labeltwo: 'Label Two',
        valuetwo: 'Waarde 2',

        labelthree: 'Label 3',
        valuethree: 'Waarde 3',

        labelfour: 'Label 4',
        valuefour: 'Waarde 4',

        labelfive: 'Label 5',
        valuefive: 'Waarde 5',

        labelsix: 'Label 6',
        valuesix: 'Waarde 6',

// theme3

        ttheadline: 'Jouw naam',

        ttsubtitle: 'Mijn onvergetelijke avontuur',

        coordinaten: 'Waarde één',
        ras: 'Waarde twee',
       
 
    };
    DESIGN.layer.position = {
        position : 'layout-bottom',
    };
    DESIGN.layer.theme = {
        layout_theme : 'theme-three',
    };
    DESIGN.layer.colors = {
        primary: '#000',
        primary_color_active: false,
        secondary: '#000',
        secondary_color_active: false,
        background: '#d7d9d9',
        background_color_active: false,
        activity: '#e76c2f',
        activity_color_active: false,
        elevation: '#c1c3c3',
        elevation_color_active: false,
   
    };
 
