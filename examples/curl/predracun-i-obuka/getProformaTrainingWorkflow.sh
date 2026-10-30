# Read a Proforma or Training workflow: GET /v1/proforma-training-workflows/{proformaTrainingWorkflowId}
# Docs: https://bokapos.rs/en/api/referenca/predracun-i-obuka#getProformaTrainingWorkflow
# Values are illustrative sandbox values; replace the ids with your own.
curl -X GET "https://api.bokapos.rs/v1/proforma-training-workflows/0a1b2c3d-4e5f-4a6b-8c7d-8e9f0a1b2c3d" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN"
