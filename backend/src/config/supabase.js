const { createClient } = require("@supabase/supabase-js");
require("dotenv").config();

const supabaseUrl = process.env.SUPABASE_URL;
const supabaseKey = process.env.SUPABASE_SERVICE_ROLE_KEY;

if (!supabaseUrl || !supabaseKey) {
  throw new Error(
    "SUPABASE_URL atau SUPABASE_SERVICE_ROLE_KEY belum diatur di file .env"
  );
}

const supabase = createClient(supabaseUrl, supabaseKey);

module.exports = supabase;
