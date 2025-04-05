export default {
    "**/*.php*": ["vendor/bin/duster fix"],
    "*": [
        // Or more specific globs like "**/*.js", "**/*.css", etc.
        "prettier --write --ignore-unknown",
    ],
};
