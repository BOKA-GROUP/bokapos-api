// Update a product: PUT /v1/products/{productId}
// Docs: https://bokapos.rs/en/api/referenca/katalog#updateProduct
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Put, "/v1/products/d2e3f4a5-b6c7-4d8e-9f0a-1b2c3d4e5f60");
request.Content = new StringContent(
    """
    {
      "sku": "BT-HP-001",
      "gtin": "8606012345678",
      "name": "Bluetooth slušalice Pro",
      "unitOfMeasure": "kom",
      "grossUnitPrice": 9490,
      "taxLabels": [
        "F"
      ],
      "isActive": true
    }
    """, Encoding.UTF8, "application/json");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
