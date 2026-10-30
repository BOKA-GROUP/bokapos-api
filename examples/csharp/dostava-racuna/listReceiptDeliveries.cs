// List the deliveries of a receipt: GET /v1/receipt-deliveries
// Docs: https://bokapos.rs/en/api/referenca/dostava-racuna#listReceiptDeliveries
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Get, "/v1/receipt-deliveries?fiscalDocumentId=9f8e7d6c-5b4a-4321-8765-0fedcba98761");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
