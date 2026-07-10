{
  "$schema": "https://railway.app/railway.schema.json",
  "build": {
    "builder": "NIXPACKS"
  },
  "deploy": {
    "startCommand": "php artisan migrate --force && npx nginx -c /etc/nginx/nginx.conf",
    "restartPolicyType": "ON_FAILURE"
  }
}