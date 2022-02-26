const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                navy: {
                    50: "#f5f9fa",
                    100: "#def1fc",
                    200: "#b9def8",
                    300: "#89bded",
                    400: "#5998df",
                    500: "#2e78bc",
                    600: "#3959be",
                    700: "#2d439b",
                    800: "#202d70",
                    900: "#121b47",
                },
                ochre: {
                    50: "#fcfaf6",
                    100: "#faefcb",
                    200: "#f3d998",
                    300: "#e2b364",
                    400: "#ec7a33",
                    500: "#b46620",
                    600: "#964c14",
                    700: "#733912",
                    800: "#4f270e",
                    900: "#34180a",
                },
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
