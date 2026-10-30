// Export the catalogue (CSV): GET /v1/products/export
// Docs: https://bokapos.rs/en/api/referenca/katalog#exportProducts
// Values are illustrative sandbox values; replace the ids with your own.
import { writeFile } from "node:fs/promises";

const response = await fetch("https://api.bokapos.rs/v1/products/export?taxpayerId=3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11", {
  method: "GET",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

if (!response.ok) throw new Error(`HTTP ${response.status}`);
await writeFile("katalog.csv", Buffer.from(await response.arrayBuffer()));
