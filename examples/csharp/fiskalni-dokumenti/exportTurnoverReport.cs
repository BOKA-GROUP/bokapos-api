// Export the turnover report (CSV): GET /v1/fiscal-documents/turnover-report/export
// Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#exportTurnoverReport
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Get, "/v1/fiscal-documents/turnover-report/export?taxpayerId=3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11&businessPremiseId=b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22&pfrFrom=2026-09-01T00%3A00%3A00%2B02%3A00&pfrTo=2026-09-02T00%3A00%3A00%2B02%3A00");

using var response = await http.SendAsync(request);
response.EnsureSuccessStatusCode();
await File.WriteAllBytesAsync("promet-2026-09-01.csv", await response.Content.ReadAsByteArrayAsync());
