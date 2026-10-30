// Export the catalogue (CSV): GET /v1/products/export
// Docs: https://bokapos.rs/en/api/referenca/katalog#exportProducts
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Get, "/v1/products/export?taxpayerId=3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11");

using var response = await http.SendAsync(request);
response.EnsureSuccessStatusCode();
await File.WriteAllBytesAsync("katalog.csv", await response.Content.ReadAsByteArrayAsync());
