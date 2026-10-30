// Import the catalogue (CSV): POST /v1/products/import
// Docs: https://bokapos.rs/en/api/referenca/katalog#importProducts
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Post, "/v1/products/import?taxpayerId=3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11");
request.Content = new StringContent(File.ReadAllText("katalog.csv"), Encoding.UTF8, "text/csv");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
