![logo](wp-content/themes/marichka/img/bg/marichka-logo.png)

# Marichka smart bikes
Site and Shop endpoint for Marichka-Motors smart bikes project

- Advanced Custom Fields
- Advanced Custom Fields: Repeater Field (premium addon, *manual installation*)
- Contact Form 7	
- Polylang	
- WP Migrate DB	
- Yoast Duplicate Post	
- Yoast SEO
- SVG Support

Docker-compose file was added for local development.

`docker compose up -d`

`docker compos down`

To remove totaly everything and rebuild use `docker compose down --rmi all`

To have local database just need to export it from live site via wp-migrate plugin and import it using db tool in IDE
