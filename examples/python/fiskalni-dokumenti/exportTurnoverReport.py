# Export the turnover report (CSV): GET /v1/fiscal-documents/turnover-report/export
# Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#exportTurnoverReport
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.get(
    "https://api.bokapos.rs/v1/fiscal-documents/turnover-report/export",
    headers=headers,
    params={
        "taxpayerId": "3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11",
        "businessPremiseId": "b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22",
        "pfrFrom": "2026-09-01T00:00:00+02:00",
        "pfrTo": "2026-09-02T00:00:00+02:00",
    },
)

response.raise_for_status()
with open("promet-2026-09-01.csv", "wb") as f:
    f.write(response.content)
