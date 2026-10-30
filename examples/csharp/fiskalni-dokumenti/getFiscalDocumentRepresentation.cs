// Fetch a receipt representation: GET /v1/fiscal-documents/{fiscalDocumentId}/representations/{representationFormat}
// Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#getFiscalDocumentRepresentation
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Get, "/v1/fiscal-documents/9f8e7d6c-5b4a-4321-8765-0fedcba98761/representations/pdf-a4");

using var response = await http.SendAsync(request);
response.EnsureSuccessStatusCode();
await File.WriteAllBytesAsync("racun-ORDER-4127.pdf", await response.Content.ReadAsByteArrayAsync());
