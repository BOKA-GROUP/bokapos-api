// Search the journal: GET /v1/fiscal-documents
// Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#listFiscalDocuments
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Get, "/v1/fiscal-documents?businessPremiseId=b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22&status=FISCALIZED&createdFrom=2026-09-01T00%3A00%3A00Z&pageSize=50");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
