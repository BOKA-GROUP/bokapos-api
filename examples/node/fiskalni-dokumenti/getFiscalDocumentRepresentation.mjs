// Fetch a receipt representation: GET /v1/fiscal-documents/{fiscalDocumentId}/representations/{representationFormat}
// Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#getFiscalDocumentRepresentation
// Values are illustrative sandbox values; replace the ids with your own.
import { writeFile } from "node:fs/promises";

const response = await fetch("https://api.bokapos.rs/v1/fiscal-documents/9f8e7d6c-5b4a-4321-8765-0fedcba98761/representations/pdf-a4", {
  method: "GET",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

if (!response.ok) throw new Error(`HTTP ${response.status}`);
await writeFile("racun-ORDER-4127.pdf", Buffer.from(await response.arrayBuffer()));
