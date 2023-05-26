for dir in blocks/*/; do
    sass --style expanded --no-source-map --no-error-css --quiet ${dir}
    cleancss -O1 --output ${dir}styles.css ${dir}styles.css
done