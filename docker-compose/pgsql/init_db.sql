-- CREATE DATABASE challengedb;

SELECT 'CREATE DATABASE challengedb'
    WHERE NOT EXISTS (SELECT FROM pg_database WHERE datname = 'challengedb')\gexec
