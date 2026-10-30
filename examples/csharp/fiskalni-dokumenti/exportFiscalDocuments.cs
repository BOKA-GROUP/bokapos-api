// Export the journal (CSV): GET /v1/fiscal-documents/export
// Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#exportFiscalDocuments
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Get, "/v1/fiscal-documents/export?businessPremiseId=b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22&createdFrom=2026-09-01T00%3A00%3A00Z&createdTo=2026-10-01T00%3A00%3A00Z");

using var response = await http.SendAsync(request);
response.EnsureSuccessStatusCode();
await File.WriteAllBytesAsync("dnevnik-2026-09.csv", await response.Content.ReadAsByteArrayAsync());
