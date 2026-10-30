# BokaPOS API

BokaPOS is an approved Serbian cloud ESIR (electronic invoicing system, *elektronski sistem za izdavanje računa*) for distance selling, made by BOKA GROUP DOO, Belgrade. Your web shop, ERP or platform sends one request; BokaPOS issues the fiscal receipt through the Tax Administration's virtual fiscal processor (V-PFR) and returns the receipt number, the verification link, the QR code and the PDF.

- **Approval:** BokaPOS 1.0.1 is approved by the Tax Administration of the Republic of Serbia as ESIR IB 1774, decision 000-092-00-00256/2026-0000 of 29 October 2026 ([decision PDF](https://bokapos.rs/docs/BokaPOS-Resenje-Poreske-uprave-IB-1774.pdf), [register](https://www.purs.gov.rs/eFiskalizacija/registar-odobrenih-elemenata-efu.html?tipEfu=ESIR&naziv=BokaPOS)). Scope: distance selling only.
- **Documentation:** [bokapos.rs/en/api](https://bokapos.rs/en/api) (Serbian: [bokapos.rs/api](https://bokapos.rs/api)), the whole guide as text for AI assistants: [bokapos.rs/en/api/llms.txt](https://bokapos.rs/en/api/llms.txt).
- **Overview and pricing:** [bokapos.rs/en/api-za-fiskalizaciju](https://bokapos.rs/en/api-za-fiskalizaciju).
- **WooCommerce:** a free plugin, [BokaPOS for WooCommerce](https://wordpress.org/plugins/bokapos-for-woocommerce/).

## What is in this repository

| Path | Contents |
|---|---|
| `openapi/openapi.yaml` | The OpenAPI contract, the same file served at `https://api.bokapos.rs/openapi.yaml`. |
| `examples/<language>/<group>/<operationId>.*` | One example per operation in curl, Node.js, PHP, C# and Python (36 operations). |
| `postman/bokapos-api.postman_collection.json` | A Postman collection with OAuth 2.0 client credentials set up at collection level. |

Everything here is generated from the source of the documentation site, so it matches the published docs. Values in the examples are illustrative sandbox values.

## Quick start

1. **Request sandbox access** at [bokapos.rs/kontakt](https://bokapos.rs/kontakt) or office@bokagroup.rs. BokaPOS Administration opens the organization, assigns a sandbox security element and issues a client id (`boka-sbx-...`); an Owner or Administrator collects the secret once in the portal. The sandbox is free.
2. **Get a token** (OAuth 2.0 client credentials, valid 300 seconds):

   ```sh
   curl -X POST "https://auth.bokapos.rs/realms/boka/protocol/openid-connect/token" \
     -H "Content-Type: application/x-www-form-urlencoded" \
     -d "grant_type=client_credentials" \
     -d "client_id=$BOKAPOS_CLIENT_ID" \
     -d "client_secret=$BOKAPOS_CLIENT_SECRET"
   ```

3. **Read the current tax labels** for your premise (`GET /v1/tax-rates`), then **issue a receipt** with `POST /v1/fiscal-documents`: see [`examples/curl/fiskalni-dokumenti/createFiscalDocument.sh`](examples/curl/fiskalni-dokumenti/createFiscalDocument.sh).

Sandbox and production share `https://api.bokapos.rs`; the credential decides the environment.

## Rules that keep receipts single

- Send an `Idempotency-Key` per order. The same key with the same body returns the original document; the same key with a changed body returns `409`.
- `201` with `status: FISCALIZED` and `fiscalized: true` is the only response that means a receipt exists.
- `503` with `retryable: true` means nothing was sent: retry the same request with the same key.
- `OUTCOME_UNKNOWN` is never resent. Keep the `id` and read `GET /v1/operations/{id}` until it resolves.

Details: [conventions and statuses](https://bokapos.rs/en/api/konvencije), [errors](https://bokapos.rs/en/api/greske).

## Postman

Import `postman/bokapos-api.postman_collection.json`, set the collection variables `clientId` and `clientSecret`, then use **Get New Access Token** on the collection's Authorization tab.

## Na srpskom

BokaPOS je odobren ESIR u cloudu za prodaju na daljinu (IB 1774, rešenje Poreske uprave br. 000-092-00-00256/2026-0000 od 29. oktobra 2026), proizvod firme BOKA GROUP DOO iz Beograda. Ovde su OpenAPI ugovor, primeri za svaku operaciju u pet jezika i Postman kolekcija. Dokumentacija na srpskom: [bokapos.rs/api](https://bokapos.rs/api); pregled i cena: [bokapos.rs/api-za-fiskalizaciju](https://bokapos.rs/api-za-fiskalizaciju). Probni pristup: [bokapos.rs/kontakt](https://bokapos.rs/kontakt).

## License

The examples and the Postman collection are released under the MIT License (see `LICENSE`). The OpenAPI file describes the BokaPOS service and is published for integration with it.
