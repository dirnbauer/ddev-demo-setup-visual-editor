# DDEV Setup

## Prerequisites

- [DDEV](https://ddev.readthedocs.io/) installed
- Docker running

## First-time setup

```bash
cp config/system/settings.php.example config/system/settings.php
ddev start
ddev composer install
ddev typo3 cache:flush
```

## Settings and Secrets

`config/system/settings.php` is **gitignored** — TYPO3's Install Tool overwrites it with plain values whenever you save extension settings. A `settings.php.example` is committed as a template with `getenv()` calls for secrets.

Secrets are injected via environment variables. DDEV reads these from `.ddev/config.local.yaml`, which is also gitignored.

Create `.ddev/config.local.yaml` with the following content and fill in the actual values:

```yaml
web_environment:
  - TYPO3_WORKOS_API_KEY=<workos-api-key>
  - TYPO3_WORKOS_CLIENT_ID=<workos-client-id>
  - TYPO3_WORKOS_COOKIE_PASSWORD=<workos-cookie-password>
  - TYPO3_ENCRYPTION_KEY=<typo3-encryption-key>
```

| Variable | Where to find it |
|---|---|
| `TYPO3_WORKOS_API_KEY` | [WorkOS Dashboard](https://dashboard.workos.com/) → API Keys |
| `TYPO3_WORKOS_CLIENT_ID` | WorkOS Dashboard → Configuration |
| `TYPO3_WORKOS_COOKIE_PASSWORD` | Generate: `openssl rand -base64 32` |
| `TYPO3_ENCRYPTION_KEY` | From existing setup or generate: `openssl rand -hex 48` |

After creating or updating `config.local.yaml`, run `ddev restart` to apply the changes.

## Disabling phpMyAdmin

The phpMyAdmin DDEV addon is disabled by default (renamed to `.yaml.disabled`) to speed up container startup. To re-enable it:

```bash
mv .ddev/docker-compose.phpmyadmin.yaml.disabled .ddev/docker-compose.phpmyadmin.yaml
mv .ddev/docker-compose.phpmyadmin_norouter.yaml.disabled .ddev/docker-compose.phpmyadmin_norouter.yaml
ddev restart
```
