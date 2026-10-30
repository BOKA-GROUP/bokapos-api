// Import the catalogue (CSV): POST /v1/products/import
// Docs: https://bokapos.rs/en/api/referenca/katalog#importProducts
// Values are illustrative sandbox values; replace the ids with your own.
import { readFile } from "node:fs/promises";

const response = await fetch("https://api.bokapos.rs/v1/products/import?taxpayerId=3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11", {
  method: "POST",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
    "Content-Type": "text/csv",
  },
  body: await readFile("katalog.csv"),
});

const result = await response.json();
console.log(response.status, result);
