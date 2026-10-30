// Add a product: POST /v1/products
// Docs: https://bokapos.rs/en/api/referenca/katalog#createProduct
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Post, "/v1/products");
request.Content = new StringContent(
    """
    {
      "taxpayerId": "3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11",
      "sku": "BT-HP-001",
      "gtin": "8606012345678",
      "name": "Bluetooth slušalice",
      "unitOfMeasure": "kom",
      "grossUnitPrice": 8990,
      "taxLabels": [
        "F"
      ]
    }
    """, Encoding.UTF8, "application/json");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
