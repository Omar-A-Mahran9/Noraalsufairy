import { MigrationInterface, QueryRunner } from "typeorm";

export class Migrations1727152358932 implements MigrationInterface {
    name = 'Migrations1727152358932'

    public async up(queryRunner: QueryRunner): Promise<void> {
        await queryRunner.query(`DROP INDEX \`FK_312d729856ff0972d3734f5da24\` ON \`offers_lapor_sectors\``);
        await queryRunner.query(`DROP INDEX \`FK_5327fdc70b68bd4cf3bdd9e0014\` ON \`offers_lapor_sectors\``);
        await queryRunner.query(`ALTER TABLE \`fund_companies\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`fund_companies\` CHANGE \`logo\` \`logo\` varchar(255) NULL`);
        await queryRunner.query(`ALTER TABLE \`labor_sector\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`offers_lapor_sectors\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`offers_lapor_sectors\` CHANGE \`nationality\` \`nationality\` enum ('Saudi Arabian', 'Residence') NOT NULL`);
        await queryRunner.query(`ALTER TABLE \`offers_lapor_sectors\` CHANGE \`laporsectorId\` \`laporsectorId\` int NULL`);
        await queryRunner.query(`ALTER TABLE \`offers_lapor_sectors\` CHANGE \`offerId\` \`offerId\` int NULL`);
        await queryRunner.query(`ALTER TABLE \`cities\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`fund_company_branches\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`fund_company_branches\` CHANGE \`lat\` \`lat\` double NULL`);
        await queryRunner.query(`ALTER TABLE \`fund_company_branches\` CHANGE \`long\` \`long\` double NULL`);
        await queryRunner.query(`ALTER TABLE \`agency_branches\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`agency_branches\` CHANGE \`lat\` \`lat\` double NULL`);
        await queryRunner.query(`ALTER TABLE \`agency_branches\` CHANGE \`long\` \`long\` double NULL`);
        await queryRunner.query(`ALTER TABLE \`agency_branches\` CHANGE \`stamp\` \`stamp\` varchar(255) NULL`);
        await queryRunner.query(`ALTER TABLE \`agency_branches\` CHANGE \`signature\` \`signature\` varchar(255) NULL`);
        await queryRunner.query(`ALTER TABLE \`roles\` DROP FOREIGN KEY \`FK_5dbd33adaf88e38733304868abe\``);
        await queryRunner.query(`ALTER TABLE \`roles\` DROP FOREIGN KEY \`FK_c231afa9354c6c8b67641e060f1\``);
        await queryRunner.query(`ALTER TABLE \`roles\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`roles\` CHANGE \`agency_branch_id\` \`agency_branch_id\` int NULL`);
        await queryRunner.query(`ALTER TABLE \`roles\` CHANGE \`funding_branch_id\` \`funding_branch_id\` int NULL`);
        await queryRunner.query(`ALTER TABLE \`admins\` DROP FOREIGN KEY \`FK_3daa2179c1aa8a1c02c86fe1112\``);
        await queryRunner.query(`ALTER TABLE \`admins\` DROP FOREIGN KEY \`FK_5d82e984646bfaa81f1ad3caccd\``);
        await queryRunner.query(`ALTER TABLE \`admins\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`admins\` CHANGE \`logo\` \`logo\` varchar(255) NULL`);
        await queryRunner.query(`ALTER TABLE \`admins\` CHANGE \`agency_id\` \`agency_id\` int NULL`);
        await queryRunner.query(`ALTER TABLE \`admins\` CHANGE \`fund_id\` \`fund_id\` int NULL`);
        await queryRunner.query(`ALTER TABLE \`attachments_requests\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`attachments_requests\` CHANGE \`file\` \`file\` varchar(255) NULL`);
        await queryRunner.query(`ALTER TABLE \`colors\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`car_prices\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`cars\` DROP FOREIGN KEY \`FK_39461c3a771c0970cd9ddb01ced\``);
        await queryRunner.query(`ALTER TABLE \`cars\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`cars\` CHANGE \`gear_shifter\` \`gear_shifter\` enum ('Manual', 'Automatic', 'SemiAutomatic') NULL`);
        await queryRunner.query(`ALTER TABLE \`cars\` CHANGE \`car_body\` \`car_body\` enum ('Hatchback', 'Sedan', 'FourWheelDrive', 'Commercial', 'Family') NULL`);
        await queryRunner.query(`ALTER TABLE \`cars\` CHANGE \`fuel_type\` \`fuel_type\` enum ('Gasoline', 'Diesel', 'Electric', 'Hybrid') NULL`);
        await queryRunner.query(`ALTER TABLE \`cars\` CHANGE \`sub_model_id\` \`sub_model_id\` int NULL`);
        await queryRunner.query(`ALTER TABLE \`clients_score\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`clients_score\` CHANGE \`nationality\` \`nationality\` enum ('Saudi Arabian', 'Residence') NOT NULL DEFAULT 'Saudi Arabian'`);
        await queryRunner.query(`ALTER TABLE \`clients\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`clients\` CHANGE \`Identity_no\` \`Identity_no\` varchar(255) NULL`);
        await queryRunner.query(`ALTER TABLE \`requests_histories\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`requests\` DROP FOREIGN KEY \`FK_661ac7d80f7cb9445678210ca8f\``);
        await queryRunner.query(`ALTER TABLE \`requests\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`requests\` CHANGE \`first_batch\` \`first_batch\` int NULL`);
        await queryRunner.query(`ALTER TABLE \`requests\` CHANGE \`last_batch\` \`last_batch\` int NULL`);
        await queryRunner.query(`ALTER TABLE \`requests\` CHANGE \`chassis_no\` \`chassis_no\` varchar(255) NULL`);
        await queryRunner.query(`ALTER TABLE \`requests\` CHANGE \`specifications\` \`specifications\` longtext NULL`);
        await queryRunner.query(`ALTER TABLE \`requests\` CHANGE \`car_price_id\` \`car_price_id\` int NULL`);
        await queryRunner.query(`ALTER TABLE \`requests\` CHANGE \`price\` \`price\` decimal(10,2) NULL`);
        await queryRunner.query(`ALTER TABLE \`requests\` CHANGE \`price_after_vat\` \`price_after_vat\` decimal(10,2) NULL`);
        await queryRunner.query(`ALTER TABLE \`offers\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`offers\` CHANGE \`years\` \`years\` text NULL`);
        await queryRunner.query(`ALTER TABLE \`agencies\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`agencies\` CHANGE \`logo\` \`logo\` varchar(255) NULL`);
        await queryRunner.query(`ALTER TABLE \`agencies\` CHANGE \`stamp\` \`stamp\` varchar(255) NULL`);
        await queryRunner.query(`ALTER TABLE \`agencies\` CHANGE \`signature\` \`signature\` varchar(255) NULL`);
        await queryRunner.query(`ALTER TABLE \`brands\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`brands\` CHANGE \`logo\` \`logo\` varchar(255) NULL`);
        await queryRunner.query(`ALTER TABLE \`models\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`sub_models\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`commissions\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`commissions\` CHANGE \`collected_date\` \`collected_date\` date NULL`);
        await queryRunner.query(`ALTER TABLE \`collectioncommission\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL`);
        await queryRunner.query(`ALTER TABLE \`collectioncommission\` CHANGE \`from_Date\` \`from_Date\` date NULL`);
        await queryRunner.query(`ALTER TABLE \`collectioncommission\` CHANGE \`to_Date\` \`to_Date\` date NULL`);
        await queryRunner.query(`ALTER TABLE \`offers_lapor_sectors\` ADD CONSTRAINT \`FK_312d729856ff0972d3734f5da24\` FOREIGN KEY (\`laporsectorId\`) REFERENCES \`labor_sector\`(\`id\`) ON DELETE NO ACTION ON UPDATE NO ACTION`);
        await queryRunner.query(`ALTER TABLE \`offers_lapor_sectors\` ADD CONSTRAINT \`FK_5327fdc70b68bd4cf3bdd9e0014\` FOREIGN KEY (\`offerId\`) REFERENCES \`offers\`(\`id\`) ON DELETE NO ACTION ON UPDATE NO ACTION`);
        await queryRunner.query(`ALTER TABLE \`roles\` ADD CONSTRAINT \`FK_5dbd33adaf88e38733304868abe\` FOREIGN KEY (\`agency_branch_id\`) REFERENCES \`agency_branches\`(\`id\`) ON DELETE NO ACTION ON UPDATE CASCADE`);
        await queryRunner.query(`ALTER TABLE \`roles\` ADD CONSTRAINT \`FK_c231afa9354c6c8b67641e060f1\` FOREIGN KEY (\`funding_branch_id\`) REFERENCES \`fund_company_branches\`(\`id\`) ON DELETE NO ACTION ON UPDATE CASCADE`);
        await queryRunner.query(`ALTER TABLE \`admins\` ADD CONSTRAINT \`FK_5733c73cd81c566a90cc4802f96\` FOREIGN KEY (\`role_id\`) REFERENCES \`roles\`(\`id\`) ON DELETE NO ACTION ON UPDATE CASCADE`);
        await queryRunner.query(`ALTER TABLE \`admins\` ADD CONSTRAINT \`FK_3daa2179c1aa8a1c02c86fe1112\` FOREIGN KEY (\`agency_id\`) REFERENCES \`agencies\`(\`id\`) ON DELETE NO ACTION ON UPDATE CASCADE`);
        await queryRunner.query(`ALTER TABLE \`admins\` ADD CONSTRAINT \`FK_5d82e984646bfaa81f1ad3caccd\` FOREIGN KEY (\`fund_id\`) REFERENCES \`fund_companies\`(\`id\`) ON DELETE NO ACTION ON UPDATE CASCADE`);
        await queryRunner.query(`ALTER TABLE \`attachments_requests\` ADD CONSTRAINT \`FK_3222964e0437f911126d8f2f88f\` FOREIGN KEY (\`request_id\`) REFERENCES \`requests\`(\`id\`) ON DELETE NO ACTION ON UPDATE NO ACTION`);
        await queryRunner.query(`ALTER TABLE \`attachments_requests\` ADD CONSTRAINT \`FK_7c70afe4b06524a903b12052afe\` FOREIGN KEY (\`created_by\`) REFERENCES \`admins\`(\`id\`) ON DELETE NO ACTION ON UPDATE NO ACTION`);
        await queryRunner.query(`ALTER TABLE \`cars\` ADD CONSTRAINT \`FK_39461c3a771c0970cd9ddb01ced\` FOREIGN KEY (\`sub_model_id\`) REFERENCES \`sub_models\`(\`id\`) ON DELETE NO ACTION ON UPDATE CASCADE`);
        await queryRunner.query(`ALTER TABLE \`requests\` ADD CONSTRAINT \`FK_661ac7d80f7cb9445678210ca8f\` FOREIGN KEY (\`car_price_id\`) REFERENCES \`car_prices\`(\`id\`) ON DELETE NO ACTION ON UPDATE NO ACTION`);
    }

    public async down(queryRunner: QueryRunner): Promise<void> {
        await queryRunner.query(`ALTER TABLE \`requests\` DROP FOREIGN KEY \`FK_661ac7d80f7cb9445678210ca8f\``);
        await queryRunner.query(`ALTER TABLE \`cars\` DROP FOREIGN KEY \`FK_39461c3a771c0970cd9ddb01ced\``);
        await queryRunner.query(`ALTER TABLE \`attachments_requests\` DROP FOREIGN KEY \`FK_7c70afe4b06524a903b12052afe\``);
        await queryRunner.query(`ALTER TABLE \`attachments_requests\` DROP FOREIGN KEY \`FK_3222964e0437f911126d8f2f88f\``);
        await queryRunner.query(`ALTER TABLE \`admins\` DROP FOREIGN KEY \`FK_5d82e984646bfaa81f1ad3caccd\``);
        await queryRunner.query(`ALTER TABLE \`admins\` DROP FOREIGN KEY \`FK_3daa2179c1aa8a1c02c86fe1112\``);
        await queryRunner.query(`ALTER TABLE \`admins\` DROP FOREIGN KEY \`FK_5733c73cd81c566a90cc4802f96\``);
        await queryRunner.query(`ALTER TABLE \`roles\` DROP FOREIGN KEY \`FK_c231afa9354c6c8b67641e060f1\``);
        await queryRunner.query(`ALTER TABLE \`roles\` DROP FOREIGN KEY \`FK_5dbd33adaf88e38733304868abe\``);
        await queryRunner.query(`ALTER TABLE \`offers_lapor_sectors\` DROP FOREIGN KEY \`FK_5327fdc70b68bd4cf3bdd9e0014\``);
        await queryRunner.query(`ALTER TABLE \`offers_lapor_sectors\` DROP FOREIGN KEY \`FK_312d729856ff0972d3734f5da24\``);
        await queryRunner.query(`ALTER TABLE \`collectioncommission\` CHANGE \`to_Date\` \`to_Date\` date NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`collectioncommission\` CHANGE \`from_Date\` \`from_Date\` date NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`collectioncommission\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`commissions\` CHANGE \`collected_date\` \`collected_date\` date NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`commissions\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`sub_models\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`models\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`brands\` CHANGE \`logo\` \`logo\` varchar(255) CHARACTER SET "utf8" COLLATE "utf8_general_ci" NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`brands\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`agencies\` CHANGE \`signature\` \`signature\` varchar(255) CHARACTER SET "utf8" COLLATE "utf8_general_ci" NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`agencies\` CHANGE \`stamp\` \`stamp\` varchar(255) CHARACTER SET "utf8" COLLATE "utf8_general_ci" NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`agencies\` CHANGE \`logo\` \`logo\` varchar(255) CHARACTER SET "utf8" COLLATE "utf8_general_ci" NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`agencies\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`offers\` CHANGE \`years\` \`years\` text CHARACTER SET "utf8" COLLATE "utf8_general_ci" NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`offers\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`requests\` CHANGE \`price_after_vat\` \`price_after_vat\` decimal(10,2) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`requests\` CHANGE \`price\` \`price\` decimal(10,2) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`requests\` CHANGE \`car_price_id\` \`car_price_id\` int NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`requests\` CHANGE \`specifications\` \`specifications\` longtext NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`requests\` CHANGE \`chassis_no\` \`chassis_no\` varchar(255) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`requests\` CHANGE \`last_batch\` \`last_batch\` int NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`requests\` CHANGE \`first_batch\` \`first_batch\` int NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`requests\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`requests\` ADD CONSTRAINT \`FK_661ac7d80f7cb9445678210ca8f\` FOREIGN KEY (\`car_price_id\`) REFERENCES \`car_prices\`(\`id\`) ON DELETE NO ACTION ON UPDATE NO ACTION`);
        await queryRunner.query(`ALTER TABLE \`requests_histories\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`clients\` CHANGE \`Identity_no\` \`Identity_no\` varchar(255) CHARACTER SET "utf8" COLLATE "utf8_general_ci" NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`clients\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`clients_score\` CHANGE \`nationality\` \`nationality\` enum CHARACTER SET "utf8" COLLATE "utf8_general_ci" ('Saudi Arabian', 'Residence') NOT NULL`);
        await queryRunner.query(`ALTER TABLE \`clients_score\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`cars\` CHANGE \`sub_model_id\` \`sub_model_id\` int NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`cars\` CHANGE \`fuel_type\` \`fuel_type\` enum CHARACTER SET "utf8" COLLATE "utf8_general_ci" ('Gasoline', 'Diesel', 'Electric', 'Hybrid') NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`cars\` CHANGE \`car_body\` \`car_body\` enum CHARACTER SET "utf8" COLLATE "utf8_general_ci" ('Hatchback', 'Sedan', 'FourWheelDrive', 'Commercial', 'Family') NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`cars\` CHANGE \`gear_shifter\` \`gear_shifter\` enum CHARACTER SET "utf8" COLLATE "utf8_general_ci" ('Manual', 'Automatic', 'SemiAutomatic') NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`cars\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`cars\` ADD CONSTRAINT \`FK_39461c3a771c0970cd9ddb01ced\` FOREIGN KEY (\`sub_model_id\`) REFERENCES \`sub_models\`(\`id\`) ON DELETE NO ACTION ON UPDATE CASCADE`);
        await queryRunner.query(`ALTER TABLE \`car_prices\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`colors\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`attachments_requests\` CHANGE \`file\` \`file\` varchar(255) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`attachments_requests\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`admins\` CHANGE \`fund_id\` \`fund_id\` int NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`admins\` CHANGE \`agency_id\` \`agency_id\` int NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`admins\` CHANGE \`logo\` \`logo\` varchar(255) CHARACTER SET "utf8" COLLATE "utf8_general_ci" NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`admins\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`admins\` ADD CONSTRAINT \`FK_5d82e984646bfaa81f1ad3caccd\` FOREIGN KEY (\`fund_id\`) REFERENCES \`fund_companies\`(\`id\`) ON DELETE NO ACTION ON UPDATE CASCADE`);
        await queryRunner.query(`ALTER TABLE \`admins\` ADD CONSTRAINT \`FK_3daa2179c1aa8a1c02c86fe1112\` FOREIGN KEY (\`agency_id\`) REFERENCES \`agencies\`(\`id\`) ON DELETE NO ACTION ON UPDATE CASCADE`);
        await queryRunner.query(`ALTER TABLE \`roles\` CHANGE \`funding_branch_id\` \`funding_branch_id\` int NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`roles\` CHANGE \`agency_branch_id\` \`agency_branch_id\` int NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`roles\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`roles\` ADD CONSTRAINT \`FK_c231afa9354c6c8b67641e060f1\` FOREIGN KEY (\`funding_branch_id\`) REFERENCES \`fund_company_branches\`(\`id\`) ON DELETE NO ACTION ON UPDATE CASCADE`);
        await queryRunner.query(`ALTER TABLE \`roles\` ADD CONSTRAINT \`FK_5dbd33adaf88e38733304868abe\` FOREIGN KEY (\`agency_branch_id\`) REFERENCES \`agency_branches\`(\`id\`) ON DELETE NO ACTION ON UPDATE CASCADE`);
        await queryRunner.query(`ALTER TABLE \`agency_branches\` CHANGE \`signature\` \`signature\` varchar(255) CHARACTER SET "utf8" COLLATE "utf8_general_ci" NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`agency_branches\` CHANGE \`stamp\` \`stamp\` varchar(255) CHARACTER SET "utf8" COLLATE "utf8_general_ci" NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`agency_branches\` CHANGE \`long\` \`long\` double(22) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`agency_branches\` CHANGE \`lat\` \`lat\` double(22) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`agency_branches\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`fund_company_branches\` CHANGE \`long\` \`long\` double(22) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`fund_company_branches\` CHANGE \`lat\` \`lat\` double(22) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`fund_company_branches\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`cities\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`offers_lapor_sectors\` CHANGE \`offerId\` \`offerId\` int NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`offers_lapor_sectors\` CHANGE \`laporsectorId\` \`laporsectorId\` int NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`offers_lapor_sectors\` CHANGE \`nationality\` \`nationality\` enum ('saudi', 'foreign') NOT NULL`);
        await queryRunner.query(`ALTER TABLE \`offers_lapor_sectors\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`labor_sector\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`fund_companies\` CHANGE \`logo\` \`logo\` varchar(255) CHARACTER SET "utf8" COLLATE "utf8_general_ci" NULL DEFAULT 'NULL'`);
        await queryRunner.query(`ALTER TABLE \`fund_companies\` CHANGE \`deleted_at\` \`deleted_at\` datetime(6) NULL DEFAULT 'NULL'`);
        await queryRunner.query(`CREATE INDEX \`FK_5327fdc70b68bd4cf3bdd9e0014\` ON \`offers_lapor_sectors\` (\`offerId\`)`);
        await queryRunner.query(`CREATE INDEX \`FK_312d729856ff0972d3734f5da24\` ON \`offers_lapor_sectors\` (\`laporsectorId\`)`);
    }

}
