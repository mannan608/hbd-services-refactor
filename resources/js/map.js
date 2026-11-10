import jsVectorMap from 'jsvectormap';
import 'jsvectormap/dist/maps/world';
import 'jsvectormap/dist/jsvectormap.min.css';

export const initMap = () => {
    const mapElement = document.querySelector('#mapOne');

    if (mapElement && mapElement.dataset.mapReady !== 'true') {
        mapElement.dataset.mapReady = 'true';

        new jsVectorMap({
            selector: mapElement,
            map: "world",

            zoomButtons: false,

            regionStyle: {
                initial: {
                    fontFamily: "Outfit",
                    fill: "#E5E7EB",
                    fillOpacity: 1,
                },

                hover: {
                    fill: "#155b9d",
                    fillOpacity: 0.8,
                },

                selected: {
                    fill: "#BFEFFF",
                },

                selectedHover: {
                    fill: "#155b9d",
                },
            },

            // Highlight Australia
            selectedRegions: ['AU'],

            markers: [
                {
                    name: "Australia - Sydney",
                    coords: [-33.876735, 151.209028],
                    url: "/destination/australia",
                },
                {
                    name: "Malaysia - Kuala Lumpur",
                    coords: [3.067812, 101.660145],
                    url: "/destination/malaysia",
                },
                {
                    name: "Bangladesh - Dhaka",
                    coords: [23.746142, 90.404215],
                    url: "/destination/bangladesh",
                },
                {
                    name: "United Kingdom - London",
                    coords: [51.507351, -0.127758],
                    url: "/destination/united-kingdom",
                },
                {
                    name: "United States - New York",
                    coords: [40.712776, -74.005974],
                    url: "/destination/united-states",
                },
                {
                    name: "Canada - Toronto",
                    coords: [43.653226, -79.383184],
                    url: "/destination/canada",
                },
                {
                    name: "New Zealand - Auckland",
                    coords: [-36.850109, 174.767700],
                    url: "/destination/new-zealand",
                },
            ],

            markerStyle: {
                initial: {
                    strokeWidth: 1,
                    stroke: "#FFFFFF",
                    fill: "#155b9d",
                    fillOpacity: 1,
                    r: 8,
                },

                hover: {
                    fill: "#155b9d",
                    fillOpacity: 1,
                },

                selected: {},

                selectedHover: {},
            },
        });
    }
};

export default initMap;