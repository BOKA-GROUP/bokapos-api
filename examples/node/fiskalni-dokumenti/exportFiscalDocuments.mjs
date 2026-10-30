// Export the journal (CSV): GET /v1/fiscal-documents/export
// Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#exportFiscalDocuments
// Values are illustrative sandbox values; replace the ids with your own.
import { writeFile } from "node:fs/promises";

const response = await fetch("https://api.bokapos.rs/v1/fiscal-documents/export?businessPremiseId=b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22&createdFrom=2026-09-01T00%3A00%3A00Z&createdTo=2026-10-01T00%3A00%3A00Z", {
  method: "GET",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

if (!response.ok) throw new Error(`HTTP ${response.status}`);
await writeFile("dnevnik-2026-09.csv", Buffer.from(await response.arrayBuffer()));
